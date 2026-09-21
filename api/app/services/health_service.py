from datetime import date

from sqlalchemy.orm import Session

from app.repositories.health_repository import HealthRepository
from app.schemas.health import HealthSyncRequest
from app.utils.mock_health import generate_mock_health_data

class HealthService:


    @staticmethod
    def sync(
        db: Session,
        user,
        payload
    ):

        return HealthRepository.create_or_update(
            db,
            user.id,
            payload
        )
        
        
    @staticmethod
    def mock(db, user):

        payload = HealthSyncRequest(
            date=date.today(),
            **generate_mock_health_data()
        )

        return HealthRepository.create_or_update(
            db=db,
            user_id=user.id,
            data=payload
        )