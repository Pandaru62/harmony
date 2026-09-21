from datetime import datetime

from pydantic import BaseModel, ConfigDict


class UserResponse(BaseModel):
    model_config = ConfigDict(from_attributes=True)

    public_id: str

    email: str
    display_name: str

    firstname: str
    lastname: str

    avatar: str | None

    created_at: datetime
    
class UserMeResponse(BaseModel):
    model_config = ConfigDict(from_attributes=True)

    public_id: str
    email: str
    display_name: str

    firstname: str
    lastname: str

    avatar: str | None

    created_at: datetime
    last_login: datetime | None
    last_sync: datetime | None