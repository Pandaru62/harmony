from datetime import datetime

from sqlalchemy import DateTime, func, ForeignKey
from sqlalchemy.orm import Mapped, mapped_column, relationship

from app.database.base import Base

class UserMedal(Base):
    __tablename__ = "user_medals"

    user_id: Mapped[int] = mapped_column(
        ForeignKey("api_users.id", ondelete="CASCADE"),
        primary_key=True
    )

    medal_id: Mapped[int] = mapped_column(
        ForeignKey("medals.id", ondelete="CASCADE"),
        primary_key=True
    )

    unlocked_at: Mapped[datetime] = mapped_column(
        DateTime(timezone=True),
        server_default=func.now()
    )

    user: Mapped["User"] = relationship(
        back_populates="user_medals"
    )

    medal: Mapped["Medal"] = relationship(
        back_populates="user_medals"
    )