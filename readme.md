
# Chatter

Chatter is a simple web application that allows users to post and view messages without any login or security features. This application is built using PHP for the backend and utilizes a JSON file to store messages.

## Features

- Simple interface for posting messages.
- Messages are stored in a `messages.json` file.
- No user authentication or registration required.

## Getting Started

### Prerequisites

- PHP installed on your machine (version 7.0 or higher).
- A web browser.

### Installation

1. **Clone the Repository** (or download the ZIP file):
   ```bash
   git clone <repository-url>
   ```
   Replace `<repository-url>` with the URL of your GitHub repository.

2. **Navigate to the Project Directory**:
   ```bash
   cd Chatter
   ```

3. **Create an Empty JSON File**:
   Make sure to create an empty `messages.json` file in the project directory:
   ```bash
   touch messages.json
   ```

### Running the Application

1. **Start the Local Server**:
   Use PHP's built-in server to run the application:
   ```bash
   php -S localhost:8000
   ```

2. **Open Your Web Browser**:
   Go to `http://localhost:8000` to access the Chatter application.

### Usage

1. Type your message in the input field.
2. Click the "Post" button to submit your message.
3. All submitted messages will be displayed below the input field.

## File Structure

```
Chatter/
│
├── index.php          # Main page for displaying messages and the input form.
├── post.php           # Handles message submissions.
└── messages.json      # Stores the messages in JSON format.
```

## Contributing

Contributions are welcome!

### Instructions to Save

1. **Create a File**: Open your text editor (like VS Code) and create a new file named `README.md` in the `Chatter` directory.
2. **Paste the Content**: Copy the above Markdown content and paste it into the `README.md` file.
3. **Save the File**: Save the changes.
