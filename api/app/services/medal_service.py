from sqlalchemy.orm import Session

from app.models.user import User
from app.models.medal import Medal
from app.models.health_data import HealthData
from app.models.user_medal import UserMedal


class MedalService:

    @staticmethod
    def unlock_medal(
        db: Session,
        user: User,
        medal_code: str
    ):
        """
        Unlock a medal for a user if they don't already have it.
        """

        medal = (
            db.query(Medal)
            .filter(Medal.code == medal_code)
            .first()
        )

        if not medal:
            return None

        existing = (
            db.query(UserMedal)
            .filter(
                UserMedal.user_id == user.id,
                UserMedal.medal_id == medal.id
            )
            .first()
        )

        if existing:
            return None

        user_medal = UserMedal(
            user_id=user.id,
            medal_id=medal.id
        )

        db.add(user_medal)
        db.commit()

        return medal
    
    @staticmethod
    def evaluate_health_medals(
        db: Session,
        user: User,
        health_data: HealthData
    ):
        unlocked = []

        if health_data.steps >= 1000:
            medal = MedalService.unlock_medal(
                db,
                user,
                "FIRST_STEPS"
            )

            if medal:
                unlocked.append(medal)

        if health_data.steps >= 10000:
            medal = MedalService.unlock_medal(
                db,
                user,
                "TEN_K_STEPS"
            )

            if medal:
                unlocked.append(medal)

        return unlocked
    
    @staticmethod
    def evaluate_streak_medals(
        db: Session,
        user: User,
        streak: int
    ):

        unlocked = []


        if streak >= 3:
            medal = MedalService.unlock_medal(
                db,
                user,
                "BEGINNER_STREAK"
            )

            if medal:
                unlocked.append(medal)


        if streak >= 14:
            medal = MedalService.unlock_medal(
                db,
                user,
                "SOLID_STREAK"
            )

            if medal:
                unlocked.append(medal)


        if streak >= 50:
            medal = MedalService.unlock_medal(
                db,
                user,
                "UNSTOPPABLE"
            )

            if medal:
                unlocked.append(medal)


        return unlocked