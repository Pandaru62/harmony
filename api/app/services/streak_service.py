from datetime import date, timedelta

from sqlalchemy.orm import Session

from app.models.health_data import HealthData


class StreakService:

    @staticmethod
    def get_current_streak(
        db: Session,
        user_id: int
    ) -> int:

        records = (
            db.query(HealthData.date)
            .filter(
                HealthData.user_id == user_id
            )
            .order_by(
                HealthData.date.desc()
            )
            .all()
        )


        if not records:
            return 0


        active_dates = {
            record.date
            for record in records
        }


        streak = 0
        current_day = date.today()


        while current_day in active_dates:

            streak += 1
            current_day -= timedelta(days=1)


        return streak