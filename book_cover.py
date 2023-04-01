from PIL import Image, ImageDraw, ImageFont
import mysql.connector
import os
import textwrap

# MySQL database configuration
db_config = {
  'host': 'localhost',
  'user': 'root',
  'password': 'root',
  'database': 'jupiterdb',
  'port' : '8889'
}

# Connect to MySQL database
db = mysql.connector.connect(**db_config)
cursor = db.cursor()

# SQL query to select books
query = "SELECT isbn, title, author FROM books"
cursor.execute(query)
books = cursor.fetchall()

# Set the width and height of the cover image
width, height = 400, 400

# Set the font and font size for the book title and author name
title_font = ImageFont.truetype('arial.ttf', 36)
author_font = ImageFont.truetype('arial.ttf', 24)

# Define the background color for the cover image 
background_color = (242,223,215)

# Create a folder to store the book cover images
if not os.path.exists('img/covers'):
    os.makedirs('img/covers')

# Loop through each book and create a cover image
for book in books:
    # Create a new image object with the specified width, height, and background color
    image = Image.new('RGB', (width, height), background_color)

    # Get a drawing context for the image
    draw = ImageDraw.Draw(image)

    # Wrap the title and split it into lines
    wrapped_title = textwrap.wrap(book[1], width=20)
    title_lines = len(wrapped_title)

    # Calculate the x and y coordinates for the book title and author name
    title_x, title_y = width / 2, (height - title_lines * title_font.size) / 2
    author_x, author_y = width / 2, height - 50

    # Draw the book title and author name on the image
    for line in wrapped_title:
        w, h = draw.textsize(line, font=title_font)
        draw.text(((width - w) / 2, title_y), line, fill='black', font=title_font)
        title_y += h

    draw.text((author_x, author_y), book[2], fill='black', font=author_font, anchor='mb')

    # Save the image to a file with the book's ISBN as the file name
    filename = f'img/covers/{book[0]}.jpg'
    image.save(filename, format='JPEG')

    # Update the book record in the database with the cover image file name
    query = "UPDATE books SET cover=%s WHERE isbn=%s"
    values = (filename, book[0])
    cursor.execute(query, values)
    db.commit()

# Close the database connection
db.close()
