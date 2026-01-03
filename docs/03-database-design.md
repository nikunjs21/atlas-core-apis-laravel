## core tables:

- users:
```
-- id, name, email, password, email_verified_at, remember_token, created_at, updated_at
-- indexes: id => primary, search => email, password
-- purpose: manage user data and authentication
```

- workspaces
```   
-- id, user_id, name, created_at, updated_at
-- indexes: id => primary, search => user_id 
-- purpose: to create a workspace by owner
```

- workspace_users
```
-- id, workspace_id, user_id
-- indexes: id => primary, search => workspace_id, user_id
-- purpose: to add / invite users in workspace
```

- roles
```
-- id, user_id, role
-- indexes: id => primary, search => user_id, role
-- role: enum('OWNER', 'ADMIN', 'MANAGER', 'LEAD', 'SENIOR', 'MEMBER')
-- purpose: to provide privileges based on role
```

- task
```
-- id, created_by, title, description, assignee, status, created_at, updated_at
-- indexes: id => primary | search => created_by, assignee, status, title | time => created_at
-- status: enum('To Do', 'In Progress', 'Review', 'QA', 'Deploy', 'Done')
-- purpose: to add / modify tasks
```

- task_comments
```
-- id, task_id, user_id, comment, created_at, updated_at
-- indexes: id => primary | search => task_id
-- purpose: to store task comments
```

- chat_group
```
-- id, user_id, is_public, title, agenda, created_at, updated_at
-- indexes: id => primary | search => title, is_public
-- purpose: to have group chat
```

- chat_messages
```
-- id, is_individual, user_id, target_id, group_id, is_deleted, created_at, updated_at
-- indexes: id => primary | individual_load => is_individual, user_id, target_id | group_load => is_individual, group_id | search => is_individual, user_id, target_id, group_id
-- purpose: to store chat messages
```

- audit_logs
```
-- id, user_id, activity
-- indexes: id => primary | search => user_id, activity
-- purpose: to find out incidents occurred or to check the activity of the user
```

- todo_bucket
```
-- id, user_id, is_private, name, created_at, updated_at
-- indexes: id => primary | search => user_id, name, is_private
```

- todo_bucket_shared
```
-- id, todo_bucket_id, user_id
-- indexes: id => primary | search => todo_bucket_id, user_id
``` 

- todo_bucket_task
```
-- id, todo_bucket_id, assignee, title, reminder_at, created_at, updated_at
-- indexes: id => primary | search => todo_bucket_id, title, assignee
-- purpose: some off records tasks like send an email for promotion or ask for access for this, etc
```

  
