from datetime import datetime
import uuid

from sqlalchemy import String, Boolean, DateTime, func
from sqlalchemy.orm import Mapped, mapped_column, relationship

from app.database.base import Base


class User(Base):
    __tablename__ = "api_users"

    id: Mapped[int] = mapped_column(
        primary_key=True,
        index=True
    )
    
    public_id: Mapped[str] = mapped_column(
        String(36),
        unique=True,
        nullable=False,
        default=lambda: str(uuid.uuid4()),
        index=True
    )

    email: Mapped[str] = mapped_column(
        String(254),
        unique=True,
        nullable=False,
        index=True
    )

    hashed_password: Mapped[str] = mapped_column(
        String(255),
        nullable=False
    )
    
    refresh_token_hash: Mapped[str | None] = mapped_column(
        String(255),
        nullable=True
    )
    
    display_name: Mapped[str] = mapped_column(
        String(50),
        unique=True,
        nullable=False,
        index=True
    )

    firstname: Mapped[str] = mapped_column(
        String(100),
        nullable=False
    )

    lastname: Mapped[str] = mapped_column(
        String(100),
        nullable=False
    )

    avatar: Mapped[str | None] = mapped_column(
        String(255),
        nullable=True
    )

    is_active: Mapped[bool] = mapped_column(
        Boolean,
        default=True
    )
    
    is_verified: Mapped[bool] = mapped_column(
        Boolean,
        default=False
    )
    
    last_login: Mapped[datetime | None] = mapped_column(
        DateTime(timezone=True),
        nullable=True
    )

    last_sync: Mapped[datetime | None] = mapped_column(
        DateTime(timezone=True),
        nullable=True
    )
    
    created_at: Mapped[datetime] = mapped_column(
        DateTime(timezone=True),
        server_default=func.now()
    )

    updated_at: Mapped[datetime] = mapped_column(
        DateTime(timezone=True),
        server_default=func.now(),
        onupdate=func.now()
    )
    
    health_data = relationship(
        "HealthData",
        back_populates="user",
        cascade="all, delete"
    )
    
    user_medals = relationship(
        "UserMedal",
        back_populates="user",
        cascade="all, delete-orphan"
    )