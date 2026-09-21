from datetime import datetime

from sqlalchemy import String, Integer, DateTime, func, Enum
from sqlalchemy.orm import Mapped, mapped_column, relationship
from app.models.enums import MedalRarity

from app.database.base import Base


class Medal(Base):
    __tablename__ = "medals"

    id: Mapped[int] = mapped_column(
        primary_key=True,
        index=True
    )
    
    code: Mapped[str] = mapped_column(
        String(50),
        unique=True,
        nullable=False,
        index=True
    )

    name: Mapped[str] = mapped_column(
        String(254),
        nullable=False,
    )

    description: Mapped[str] = mapped_column(
        String(500),
        nullable=False,
    )
    
    rarity: Mapped[MedalRarity] = mapped_column(
        Enum(MedalRarity),
        nullable=False
    )
    
    points: Mapped[int | None] = mapped_column(
        Integer,
        nullable=True
    )
    
    icon: Mapped[str | None] = mapped_column(
        String(100),
        nullable=True
    )
    
    created_at: Mapped[datetime] = mapped_column(
        DateTime(timezone=True),
        server_default=func.now()
    )
    
    user_medals: Mapped[list["UserMedal"]] = relationship(
        back_populates="medal",
        cascade="all, delete-orphan"
    )