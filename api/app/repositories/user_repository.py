from sqlalchemy.orm import Session
from sqlalchemy import select
from app.models.user import User


class UserRepository:

    @staticmethod
    def get_by_email(
        db: Session,
        email: str
    ) -> User | None:

        statement = select(User).where(
            User.email == email
        )

        return db.scalar(statement)

    @staticmethod
    def get_by_display_name(
        db: Session,
        display_name: str
    ) -> User | None:
        
        statement = select(User).where(
                User.display_name == display_name
            )
    
        return db.scalar(statement)

    @staticmethod
    def create(
        db: Session,
        user: User
    ) -> User:

        db.add(user)

        db.commit()

        db.refresh(user)

        return user
    
    @staticmethod
    def update(
        db: Session,
        user: User
    ) -> User:

        db.add(user)
        db.commit()
        db.refresh(user)

        return user
    
    @staticmethod
    def get_by_public_id(
        db: Session,
        public_id: str
    ) -> User | None:

        statement = select(User).where(
            User.public_id == public_id
        )

        return db.scalar(statement)