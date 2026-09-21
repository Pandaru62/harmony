from fastapi import APIRouter, Depends

from sqlalchemy.orm import Session

from app.database.session import get_db
from app.core.dependencies import get_current_user

from app.models.user import User

from app.services.dashboard_service import DashboardService
from app.schemas.dashboard import DashboardResponse


router = APIRouter(
    prefix="/dashboard",
    tags=["Dashboard"]
)


@router.get(
    "",
    response_model=DashboardResponse
)
def dashboard(
    db: Session = Depends(get_db),
    current_user: User = Depends(get_current_user)
):

    return DashboardService.get_dashboard(
        db,
        current_user
    )