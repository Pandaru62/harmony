from random import randint, uniform


def generate_mock_health_data() -> dict:
    """
    Generate realistic health data for a single day.
    """

    steps = randint(1500, 18000)

    # Heart rate slightly correlated with activity
    if steps < 4000:
        avg_heart_rate = randint(60, 72)
    elif steps < 10000:
        avg_heart_rate = randint(68, 82)
    else:
        avg_heart_rate = randint(75, 95)

    spo2 = round(uniform(96.5, 99.8), 1)

    # Wellbeing score based on activity + randomness
    wellbeing = int(
        min(
            100,
            max(
                35,
                50
                + steps / 350
                + randint(-10, 10)
            )
        )
    )

    return {
        "steps": steps,
        "average_heart_rate": avg_heart_rate,
        "spo2": spo2,
        "wellbeing_score": wellbeing,
    }