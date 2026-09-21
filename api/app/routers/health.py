from fastapi import APIRouter, Depends

from sqlalchemy.orm import Session

from app.database.session import get_db
from app.core.dependencies import get_current_user

from app.services.health_service import HealthService
from app.services.medal_service import MedalService
from app.schemas.health import HealthSyncRequest, HealthSyncResponse
from app.services.streak_service import StreakService

router = APIRouter(
    prefix="/user-health",
    tags=["User Health"]
)


@router.post("/sync", response_model=HealthSyncResponse)
def sync_health(
    payload: HealthSyncRequest,
    db: Session = Depends(get_db),
    current_user = Depends(get_current_user)
):

    health = HealthService.sync(
        db,
        current_user,
        payload
    )
    
    new_medals = [] 
    # Activity medals 
    new_medals.extend(
        MedalService.evaluate_health_medals(
            db,
            current_user,
            health ) ) 
    # Streak calculation 
    streak = StreakService.get_current_streak(
        db,
        current_user.id
    ) 
    # Streak medals 
    new_medals.extend(
        MedalService.evaluate_streak_medals(
            db,
            current_user,
            streak
        )
    )
    
    return {
        "health": health,
        "new_medals": new_medals
    }
    
@router.post("/mock", response_model=HealthSyncResponse)
def mock_health(
    db: Session = Depends(get_db),
    current_user = Depends(get_current_user)
):
    health = HealthService.mock(
        db,
        current_user
    )
    
    new_medals = [] 
    # Activity medals 
    new_medals.extend(
        MedalService.evaluate_health_medals(
            db,
            current_user,
            health ) ) 
    # Streak calculation 
    streak = StreakService.get_current_streak(
        db,
        current_user.id
    ) 
    # Streak medals 
    new_medals.extend(
        MedalService.evaluate_streak_medals(
            db,
            current_user,
            streak
        )
    )
    
    return {
        "health": health,
        "new_medals": new_medals
    }