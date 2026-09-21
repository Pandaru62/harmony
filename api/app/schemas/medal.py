from pydantic import BaseModel


class MedalResponse(BaseModel):

    id: int
    code: str
    name: str
    description: str
    rarity: str
    points: int | None
    icon: str | None

    class Config:
        from_attributes = True