from datetime import date, datetime

from pydantic import BaseModel, Field
from app.schemas.medal import MedalResponse


class HealthSyncRequest(BaseModel):

    date: date

    steps: int = Field(
        ge=0,
        le=100000
    )

    average_heart_rate: int = Field(
        ge=30,
        le=220
    )

    spo2: float = Field(
        ge=70,
        le=100
    )

    wellbeing_score: int = Field(
        ge=0,
        le=100
    )


class HealthDataResponse(BaseModel):
    id: int
    user_id: int
    date: datetime
    steps: int
    average_heart_rate: float | None
    spo2: float | None
    wellbeing_score: float | None

    class Config:
        from_attributes = True
        
class HealthSyncResponse(BaseModel):

    health: HealthDataResponse
    new_medals: list[MedalResponse]