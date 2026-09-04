# Agriculture Portal - Deployment Readiness Guide

## What was completed
- Added centralized environment-based configuration in config.php and .env.example.
- Replaced hard-coded database connections in the main auth/session flow with shared config.
- Hardened login scripts for admin, farmer, and customer roles.
- Added Docker and Docker Compose support for easier deployment.
- Added a deployment script for local container startup.

## How to run locally
1. Copy .env.example to .env and fill in your secrets.
2. Start the app with:
   - bash deploy.sh
3. Open http://localhost:8080

## Database setup
- Import db/agriculture_portal.sql into MySQL.
- Ensure the DB credentials in .env match your environment.

## Production checklist
- Replace placeholder Stripe keys.
- Configure real SMTP credentials.
- Add real OpenAI / Weather / News API keys.
- Move to HTTPS and secure session handling.
- Consider replacing plaintext password storage with password hashing in a future hardening pass.
