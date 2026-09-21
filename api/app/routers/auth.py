from fastapi import APIRouter, Depends, HTTPException
from sqlalchemy.orm import Session

from app.database.session import get_db
from app.schemas.auth import RegisterRequest
from app.schemas.user import UserResponse, UserMeResponse
from app.services.auth_service import AuthService
from app.schemas.auth import LoginRequest, TokenResponse
from app.core.dependencies import get_current_user
from app.models.user import User

router = APIRouter(
    prefix="/auth",
    tags=["Authentication"]
)


@router.post(
    "/register",
    summary="Register a new user",
    description="Creates a new Harmony account.",
    response_model=UserResponse,
    status_code=201
)
def register(
    payload: RegisterRequest,
    db: Session = Depends(get_db)
):

    try:
        return AuthService.register(
            db,
            payload
        )

    except ValueError as e:

        raise HTTPException(
            status_code=400,
            detail=str(e)
        )
        
@router.post(
    "/login",
    response_model=TokenResponse
)
def login(
    payload: LoginRequest,
    db: Session = Depends(get_db)
):

    try:  
        return AuthService.login(
            db,
            payload
        )

    except ValueError as e:

        raise HTTPException(
            status_code=401,
            detail=str(e)
        )

@router.get(
    "/me",
    response_model=UserMeResponse
)
def me(
    current_user: User = Depends(get_current_user)
):

    return current_user
