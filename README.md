# ExTudent

ExTudent is a web-based system designed to manage and track information about ex-students of a particular institution. It allows users to perform operations such as adding new ex-students, removing ex-students, modifying ex-student records, and querying ex-student information. 

## Features

- **Altas**: Add new ex-students to the system by providing their personal information, academic history, and employment details if applicable.
- **Bajas**: Remove ex-students from the system based on their unique identifier (expediente).
- **Cambios**: Modify the details of existing ex-students, including their personal information, academic history, and employment details.
- **Consultas**: Retrieve and display information about ex-students, including their personal details, academic history, and employment status.

## Installation

To set up the Ex-Student System on your local machine, follow these steps:

1. Clone the repository: `git clone https://github.com/oscarpobletes/extudent.git`
2. Set up a web server environment (e.g., Apache) with PHP support.
3. Import the provided PostgreSQL database schema and data.
4. Update the database connection credentials in the PHP files (`alta.php`, `baja.php`, `cambio.php`, `consulta.php`) to match your PostgreSQL database configuration.
5. Place the PHP files and other required assets in the web server's document root directory.
6. Access the system by navigating to the system's URL in a web browser.

## Usage

1. Open the system in a web browser by navigating to the appropriate URL.
2. On the homepage, you will see the system logo, title, and author information.
3. Use the provided buttons to navigate to different sections of the system:
   - **Altas**: Clicking this button will take you to a page where you can add new ex-students to the system by providing their information.
   - **Bajas**: Clicking this button will take you to a page where you can remove ex-students from the system by selecting their name from a dropdown list.
   - **Cambios**: Clicking this button will take you to a page where you can modify the details of existing ex-students.
   - **Consultas**: Clicking this button will take you to a page that displays information about all ex-students in a tabular format.
4. Follow the instructions on each page to perform the desired operations.
5. After performing any operation, you can use the "Regresar" button to return to the homepage.

