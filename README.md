# Agriculture Portal

- Agriculture Portal is a machine learning-based project designed to provide predictions and recommendations for farmers. The system uses different algorithms to predict crops, recommend fertilizers, and provide rainfall and yield predictions to help farmers make informed decisions about their crops.
- IT also has direct crop sales to customer with real payment interface using Stripe API.
- Other supporting features are Chatbot using OPENAI's gpt-3.5-turbo model, Weather Forecast upto 4 days using Weather API, Agriculture realetd news using News API.

## Pre Requisites
### Get Below API Keys
- [News API](https://newsapi.org/)
- [OpenWeatherMap API](https://openweathermap.org/api)
- [Stripe API](https://dashboard.stripe.com/account/apikeys)
- [OpenAI API](https://platform.openai.com/account/api-keys)

### Environment & SMTP Setup
1. Copy the `.env.example` file to create your local `.env`:
   ```bash
   cp .env.example .env
   ```
2. For Gmail SMTP, generate an [App Password for Gmail](https://support.google.com/accounts/answer/185833?hl=en).
3. Open `.env` and fill in your credentials:
   ```ini
   DB_HOST=127.0.0.1
   DB_USERNAME=root
   DB_PASSWORD=
   DB_NAME=agriculture_portal

   SMTP_EMAIL=your-email@gmail.com
   SMTP_PASSWORD=your-16-char-app-password

   STRIPE_SECRET_KEY=sk_test_...
   STRIPE_PUBLISHABLE_KEY=pk_test_...
   OPENAI_API_KEY=sk-...
   OPENWEATHER_API_KEY=your_key
   NEWS_API_KEY=your_key
   ```
   *(Note: If SMTP credentials are empty or unconfigured during local development, an OTP popup appears automatically so you can test registration and 2FA logins without email configuration.)*

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/SamarthGouda/Agricultural-Portal.git
   cd agriculture-portal
   ```
2. Install Python ML dependencies:
   ```bash
   pip install -r requirements.txt
   ```
3. Import the database schema and sample data:
   - File: [db/agriculture_portal.sql](db/agriculture_portal.sql)
   - Import via phpMyAdmin or MySQL CLI:
     ```bash
     mysql -u root -p agriculture_portal < db/agriculture_portal.sql
     ```
4. Run the project:
   - **Using XAMPP/Apache:** Move project folder to `htdocs` or serve with PHP built-in server:
     ```bash
     php -S localhost:8000
     ```
   - **Using Docker Compose:**
     ```bash
     docker compose up -d
     ```
     Open `http://localhost:8080` in your browser.

### Docker deployment
```bash
bash deploy.sh
```

### Manual deployment
- Place the project in a PHP-enabled web root such as XAMPP or Apache.
- Ensure your MySQL server is running and the credentials in .env match it.

### Required environment values
- News API key: NEWS_API_KEY
- OpenWeatherMap API key: OPENWEATHER_API_KEY
- Stripe keys: STRIPE_SECRET_KEY and STRIPE_PUBLISHABLE_KEY
- SMTP values: SMTP_USERNAME, SMTP_PASSWORD, SMTP_FROM
- OpenAI key: OPENAI_API_KEY

## Features
- Crop Prediction
- Crop Recommendation
- Fertilizer Recommendation
- Rainfall Prediction
- Yield Prediction
- OTP Verification through mail
- Agriculture realetd news using News API
- Chatbot using OpenAI's gpt-3.5-turbo model
- Dynamically changing quotes using OpenAI's API
- Weather Forecast upto 4 days using OpenWeatherMap API
- Direct crop sales to customer with real time payment interface using Stripe API


## Technologies Used
- Python
- PHP
- Pandas
- NumPy
- JavaScript
- HTML/CSS
- Bootstrap4
- Scikit-learn

## Dataset
The Crop Management System dataset includes the following features:

### Crop Prediction Dataset
- State_Name
- District_Name
- Season
- Crop

### Crop Recommendation Dataset
- N
- P
- K
- Temperature
- Humidity
- pH
- Rainfall
- Label

### Fertilizer Recommendation Dataset
- Temparature
- Humidity
- Soil Moisture
- Soil Type
- Crop Type
- Nitrogen
- Phosphorous
- Potassium
- Fertilizer Name

### Rainfall Prediction Dataset
- SUBDIVISION
- YEAR
- JAN
- FEB
- MAR
- APR
- MAY
- JUN
- JUL
- AUG
- SEP
- OCT
- NOV
- DEC
- ANNUAL
- Jan-Feb
- Mar-May
- Jun-Sep
- Oct-Dec

### Yield Prediction Dataset
- State_Name
- District_Name
- Crop_Year
- Season
- Crop
- Area
- Production

## How to Use
- Crop Prediction: Input `State_Name`, `District_Name`, and `Season` to get the predicted crop for that location.
- Crop Recommendation: Input `N`, `P`, `K`, `Temperature`, `Humidity`, `pH`, and `Rainfall` for that location to get recommended crops for that location.
- Fertilizer Recommendation: Input `Temperature`, `Humidity`, `Soil Moisture`, `Soil Type`, `Crop Type`, `Nitrogen`, `Phosphorous`, and `Potassium` to get recommended fertilizer for that crop and location.
- Rainfall Prediction: Input `Subdivision` and `Year` to get rainfall prediction for that year.
- Yield Prediction: Input `State_Name`, `District_Name`, `Crop_Year`, `Season`, `Crop`, `Area`, `Production` to get predicted yields for that crop and location.

## License
This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
