rm -f todo.db
cat todo.sql | sqlite todo.db
cat lists.sql | sqlite3 todo.db
cat populate.sql | sqlite3 todo.db
