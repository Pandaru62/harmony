from sqlalchemy.orm import Session, joinedload
from sqlalchemy import func

from app.models.health_data import HealthData
from app.models.user_medal import UserMedal
from app.services.streak_service import StreakService

class DashboardService:


    @staticmethod
    def get_dashboard(
        db: Session,
        user
    ):

        latest_health = (
            db.query(HealthData)
            .filter(
                HealthData.user_id == user.id
            )
            .order_by(
                HealthData.date.desc()
            )
            .first()
        )


        total_steps = (
            db.query(
                func.sum(
                    HealthData.steps
                )
            )
            .filter(
                HealthData.user_id == user.id
            )
            .scalar()
            or 0
        )


        medals = (
            db.query(UserMedal)
            .options(
                joinedload(UserMedal.medal)
            )
            .filter(
                UserMedal.user_id == user.id
            )
            .all()
        )

        active_days = (
            db.query(
                func.count(
                    HealthData.id
                )
            )
            .filter(
                HealthData.user_id == user.id
            )
            .scalar()
        )
        
        average_wellbeing = (
            db.query(
                func.avg(
                    HealthData.wellbeing_score
                )
            )
            .filter(
                HealthData.user_id == user.id
            )
            .scalar()
        )
        
        current_streak = StreakService.get_current_streak(
            db,
            user.id
        )
        
        last_sync = latest_health.date if latest_health else None

        return {
            "user": {
                "display_name": user.display_name,
                "avatar": user.avatar
            },
            "health": latest_health,
            "stats": {
                "total_steps": total_steps,
                "active_days": active_days,
                "average_wellbeing": average_wellbeing,
                "last_sync": last_sync,
                "current_streak": current_streak,
            },
            "medals": [
                {
                    "name": user_medal.medal.name,
                    "icon": user_medal.medal.icon,
                    "rarity": user_medal.medal.rarity,
                    "unlocked_at": user_medal.unlocked_at
                }
                for user_medal in medals
            ]
        }