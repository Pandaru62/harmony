from fastapi import Depends, HTTPException
from fastapi.security import HTTPBearer
from jose import jwt, JWTError
from sqlalchemy.orm import Session

from app.core.config import settings
from app.database.session import get_db
from app.repositories.user_repository import UserRepository

security = HTTPBearer()

def get_current_user(
    credentials = Depends(security),
    db: Session = Depends(get_db)
):

    credentials_exception = HTTPException(
        status_code=401,
        detail="Could not validate credentials"
    )

    try:
        payload = jwt.decode(
            credentials.credentials,
            settings.JWT_SECRET_KEY,
            algorithms=[
                settings.JWT_ALGORITHM
            ]
        )

        public_id = payload.get("sub")

        if public_id is None:
            raise credentials_exception

    except JWTError:
        raise credentials_exception


    user = UserRepository.get_by_public_id(
        db,
        public_id
    )

    if user is None:
        raise credentials_exception

    return user