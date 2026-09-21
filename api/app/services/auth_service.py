from sqlalchemy.orm import Session

from app.core.security import hash_password
from app.models.user import User
from app.repositories.user_repository import UserRepository
from app.services.medal_service import MedalService
from app.schemas.auth import RegisterRequest, LoginRequest
from datetime import datetime, timezone

from app.core.security import (
    verify_password,
    create_access_token,
    create_refresh_token
)

class AuthService:

    @staticmethod
    def register(
        db: Session,
        payload: RegisterRequest
    ) -> User:

        if UserRepository.get_by_email(db, payload.email):
            raise ValueError("Email already registered")

        if UserRepository.get_by_display_name(
            db,
            payload.display_name
        ):
            raise ValueError("Display name already taken")

        user = User(
            email=payload.email.lower(),
            hashed_password=hash_password(payload.password),
            display_name=payload.display_name,

            firstname=payload.firstname,
            lastname=payload.lastname
        )

        return UserRepository.create(
            db,
            user
        )
    
    @staticmethod
    def login(
        db: Session,
        payload: LoginRequest
    ):

        user = UserRepository.get_by_email(
            db,
            payload.email.lower()
        )

        if not user:
            raise ValueError(
                "Invalid credentials"
            )

        if not verify_password(
            payload.password,
            user.hashed_password
        ):
            raise ValueError(
                "Invalid credentials"
            )


        user.last_login = datetime.now(timezone.utc)


        access_token = create_access_token({
            "sub": user.public_id
        })


        refresh_token = create_refresh_token({
            "sub": user.public_id
        })

        UserRepository.update(
            db,
            user
        )
    
        MedalService.unlock_medal(
            db,
            user,
            "FIRST_LOGIN"
        )

        return {
            "access_token": access_token,
            "refresh_token": refresh_token
        }