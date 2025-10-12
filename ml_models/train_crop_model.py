import pandas as pd
import numpy as np
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
import joblib

# Load Dataset
dataset_path = "../farmer/ML/crop_recommendation/Crop_recommendation.csv"  # Adjust path if needed
try:
    data = pd.read_csv(dataset_path)
except FileNotFoundError:
    print(f"Error: Dataset file not found at {dataset_path}")
    exit()

# Split data into features (X) and target (y)
X = data.drop(["label"], axis=1)
y = data["label"]

# Split into training and testing sets
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Train Model
model = RandomForestClassifier(n_estimators=100, random_state=42)
model.fit(X_train, y_train)

# Save the trained model
model_filename = "crop_model.pkl"
joblib.dump(model, model_filename)

print(f"Model trained and saved as {model_filename}")
