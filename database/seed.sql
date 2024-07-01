-- Selecting the data base
USE db_video_panel;

-- Inserting users data
INSERT INTO users (id, email, name, surname, avatar, password, role)
VALUES
  (1, 'fran@mail.com', 'Francisco', 'Garcia Moreno', 'https://cdn1.iconfinder.com/data/icons/avatar-2-2/512/Programmer-512.png', '12345', 'user'),
  (2, 'sergio@mail.com', 'Sergio', 'Ruiz', 'https://cdn1.iconfinder.com/data/icons/avatar-2-2/512/Programmer-512.png', '12345', 'admin');

-- Inserting videos data
INSERT INTO videos (id, title, url, date, user_id)
VALUES
  (1, 'Video 1', 'https://www.youtube.com/watch?v=JGwWNGJdvx8', '2024-06-01', 1),
  (2, 'Video 2', 'https://www.youtube.com/watch?v=JGwWNGJdvx8', '2024-06-02', 1),
  (3, 'Video 3', 'https://www.youtube.com/watch?v=JGwWNGJdvx8', '2024-06-03', 2),
  (4, 'Video 4', 'https://www.youtube.com/watch?v=JGwWNGJdvx8', '2024-06-04', 2);