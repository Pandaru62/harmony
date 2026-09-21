from datetime import datetime, date

from sqlalchemy import (
    Date,
    DateTime,
    ForeignKey,
    Integer,
    Float,
    func
)

from sqlalchemy.orm import (
    Mapped,
    mapped_column,
    relationship
)

from app.database.base import Base


class HealthData(Base):

    __tablename__ = "health_data"

    id: Mapped[int] = mapped_column(
        primary_key=True,
        index=True
    )

    user_id: Mapped[int] = mapped_column(
        ForeignKey(
            "api_users.id",
            ondelete="CASCADE"
        ),
        nullable=False,
        index=True
    )

    date: Mapped[date] = mapped_column(
        Date,
        nullable=False
    )

    steps: Mapped[int | None] = mapped_column(
        Integer,
        nullable=True
    )

    average_heart_rate: Mapped[int | None] = mapped_column(
        Integer,
        nullable=True
    )

    spo2: Mapped[float | None] = mapped_column(
        Float,
        nullable=True
    )

    wellbeing_score: Mapped[int | None] = mapped_column(
        Integer,
        nullable=True
    )

    created_at: Mapped[datetime] = mapped_column(
        DateTime,
        server_default=func.now()
    )


    user = relationship(
        "User",
        back_populates="health_data"
    )