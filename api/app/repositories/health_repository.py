from datetime import date, timedelta

from app.schemas.health import HealthSyncRequest
from sqlalchemy import select, func
from sqlalchemy.orm import Session

from app.models.health_data import HealthData


class HealthRepository:


    @staticmethod
    def get_today(
        db: Session,
        user_id: int
    ) -> HealthData | None:

        statement = (
            select(HealthData)
            .where(
                HealthData.user_id == user_id,
                HealthData.date == date.today()
            )
        )

        return db.scalar(statement)


    @staticmethod
    def get_weekly_steps(
        db: Session,
        user_id: int
    ) -> int:

        week_start = date.today() - timedelta(days=7)

        statement = (
            select(
                func.sum(
                    HealthData.steps
                )
            )
            .where(
                HealthData.user_id == user_id,
                HealthData.date >= week_start
            )
        )

        return db.scalar(statement) or 0
    
    @staticmethod
    def create_or_update(
        db: Session,
        user_id: int,
        data: HealthSyncRequest
    ):

        existing = (
            db.query(HealthData)
            .filter(
                HealthData.user_id == user_id,
                HealthData.date == data.date
            )
            .first()
        )

        if existing:

            existing.steps = data.steps
            existing.average_heart_rate = data.average_heart_rate
            existing.spo2 = data.spo2
            existing.wellbeing_score = data.wellbeing_score

            db.commit()
            db.refresh(existing)

            return existing


        health_data = HealthData(
            user_id=user_id,
            **data.model_dump()
        )

        db.add(health_data)
        db.commit()
        db.refresh(health_data)

        return health_data