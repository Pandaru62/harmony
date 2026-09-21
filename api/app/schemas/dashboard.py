from datetime import datetime

from pydantic import BaseModel


class DashboardUser(BaseModel):
    display_name: str
    avatar: str | None


class TodayHealthData(BaseModel):
    steps: int | None
    average_heart_rate: int | None
    spo2: float | None
    wellbeing_score: int | None
    
class DashboardStats(BaseModel):
    total_steps: int
    active_days: int
    average_wellbeing: float | None
    last_sync: datetime | None
    current_streak: int
    
class DashboardMedalData(BaseModel):
    name: str
    icon: str | None
    rarity: str | None
    unlocked_at: datetime

class DashboardResponse(BaseModel):

    user: DashboardUser

    health: TodayHealthData | None

    stats: DashboardStats | None

    medals: list[DashboardMedalData]