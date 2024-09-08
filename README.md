# Turf Bot

![Turf Bot](https://via.placeholder.com/728x90.png?text=Project+Logo)  <!-- Replace with your project logo if available -->

## 📋 Project Overview

Turf Bot is an automated chatbot designed to simplify the process of booking turf slots for sports and recreational activities. Integrated with Google Calendar and Integromat (Make), the bot handles booking requests, schedules slots, and sends confirmation emails to users seamlessly. This project aims to reduce manual booking efforts and provide a user-friendly interface for managing turf reservations.

## 🚀 Features

- **Automated Booking**: Users can book turf slots via the chatbot, which handles the booking process end-to-end.
- **Google Calendar Integration**: Real-time scheduling of turf slots using Google Calendar API.
- **Email Notifications**: Sends booking confirmations and reminders to users through Gmail integration.
- **Dialogflow-Powered**: Uses Dialogflow for natural language understanding, making the booking process conversational and intuitive.
- **Integromat (Make) Workflows**: Automates interactions between the chatbot, Google Calendar, and Gmail for a seamless experience.

## 🛠️ Technologies Used

- **Chatbot Platform**: Dialogflow
- **Automation Tool**: Integromat (Make)
- **Calendar Management**: Google Calendar API
- **Email Service**: Gmail API
- **Webhook Integration**: Node.js / Python for custom webhook logic

## 📂 Project Structure

turf-bot/ │ ├── dialogflow/ │ ├── intents/ # Dialogflow intents for various booking scenarios │ ├── entities/ # Custom entities for slot times, dates, etc. │ └── ... │ ├── server/ │ ├── app.js # Webhook server for handling Dialogflow requests │ ├── calendar.js # Google Calendar integration logic │ ├── email.js # Gmail integration for sending notifications │ └── ... │ ├── integromat/ │ ├── workflows/ # Integromat scenarios and workflows │ └── ... │ └── README.md # Project


## 🖥️ Getting Started

Follow these steps to set up the Turf Bot project on your local machine.

### Prerequisites

- Google Cloud account with Dialogflow, Google Calendar, and Gmail APIs enabled.
- Integromat (Make) account for automation workflows.
- Node.js / Python for the server-side webhook handling.

### Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/your-username/turf-bot.git
   <br>
<b>Navigate to the project directory:</b><br>
cd turf-bot

