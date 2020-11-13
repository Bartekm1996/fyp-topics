Menus
-

These are the menu we are thinking of so far for the Roles

Student

    MyProfile
    MyRequest
    MyProfress
    Messages
    FYP Topics
    Supervisors
    Login/Logout

Faculty

    MyProfile
    Students
    Topic Requests
    Messages
    Login/Logout

Admin

    Users
    UserManagement
    Login/Logout

### Roles

    Student
    Faculty
    Admin


#### Classes
Profile (Links to a User)

	-Address
	-Name
	-Age
	-QCA
	-Course of study
	-etc.....
User

    -StudentId
	-Email
	-FirstSeen
	-LastSeen
	-IsBlocked
	-IsRegistered
	-RoleId

Message

    -(User)User who sent
    -(User) Reciever who the message was sent to
    -Timestamp
    -Message title
    -Message body
    -RequestId all the messages should be linked to a Request (Maybe)

Request

    -User (Student)
    -Topic
    -User (Faculty)
    -Timestamp (Date student sent request)
    -State (Idle, Reviewing, Successful, Failed)
    -DecissionDate (Date of the outcome)
    -Note (Thank you but I have gave this to someone else | Thank you I have decided to select you for this topic please come to my office)

Topic

    -Title
    -Body
    -User (Faculty aka the supervisor)
    -Timestamp
    -QCA required at least
    -Max Students that can apply (maybe)?


FYPEvent

    -StartDate
    -EndDate
    -Grade (60/100) 14/20 etc
    -State (IDLE, InProgress, Complete)

UserFYPEvent (This is a join table to line the user events)

    -User
    -FYPEvent
    -Timestamp

Progress

    -User
    -UserFYPEvent (Links events to a student. Project Proposal, Project Presentation etc)
    -CurrentState (FYPEvent)
    -Lastupdated
