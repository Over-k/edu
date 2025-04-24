# Excel Table Importer - Setup Guide

This guide will help you set up and run the Excel Table Importer Django application.

## Prerequisites

- Python 3.8 or higher
- pip (Python package manager)
- virtualenv (recommended)

## Installation Steps

1. Clone the repository or extract the project files to your local machine.

2. Create and activate a virtual environment:

```bash
# Create virtual environment
python -m venv venv

# Activate on Windows
venv\Scripts\activate

# Activate on macOS/Linux
source venv/bin/activate
```

3. Install required packages:

```bash
pip install django openpyxl
```

4. Set up the Django project:

```bash
# Navigate to the project directory
cd excel_table_importer

# Run migrations
python manage.py makemigrations table_app
python manage.py migrate

# Create a superuser (optional)
python manage.py createsuperuser
```

5. Run the development server:

```bash
python manage.py runserver
```

6. Access the application:
   - Open your web browser and go to `http://127.0.0.1:8000/`

## Project Structure Overview

- `excel_table_importer/` - Main project directory
- `table_app/` - Django app containing the main functionality
  - `models.py` - Database models for tables and data
  - `views.py` - View functions handling requests
  - `forms.py` - Forms for user input
  - `templates/` - HTML templates
- `static/` - Static files (CSS, JavaScript)
- `media/` - Uploaded files (Excel files)

## Features

1. **Create Table** - Define custom tables with columns of different data types
2. **Import Data** - Upload Excel files and map headers to table columns
3. **View Data** - Browse imported data with pagination

## Usage Guide

### Creating a Table

1. Click "Create New Table" on the home page
2. Enter a name for your table and click "Create Table"
3. Add columns by specifying a name and data type for each
4. Once you've added all needed columns, click "Continue to Data Import"

### Importing Data from Excel

1. Navigate to the "Import from Excel" tab
2. Upload an Excel file (.xlsx format)
3. Match Excel headers to your table columns using drag and drop
4. Click "Import Data" to complete the import

### Viewing Data

1. Access your table from the home page
2. Click "View Data" to see the imported data
3. Use pagination controls to navigate through the data

## Troubleshooting

- **File Upload Issues**: Make sure your Excel file is in `.xlsx` format
- **Import Errors**: Check that your Excel file has headers in the first row
- **Database Issues**: If you encounter database errors, try running migrations again