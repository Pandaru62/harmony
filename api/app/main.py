from fastapi import FastAPI
from sqlalchemy import text

from app.database.session import engine
from app.routers.auth import router as auth_router
from app.routers.dashboard import router as dashboard_router
from app.routers.health import router as health_router

app = FastAPI(
    title="Harmony API",
    version="1.0.0"
)


@app.get("/")
def root():
    return {
        "message": "Harmony API running"
    }
    

@app.get("/health")
def health():
    return {
        "status": "ok"
    }


@app.get("/db-test")
def db_test():

    with engine.connect() as connection:
        result = connection.execute(text("SELECT 1"))

    return {
        "database": result.scalar()
    }
    
app.include_router(auth_router)
app.include_router(dashboard_router)
app.include_router(health_router)
