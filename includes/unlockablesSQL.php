<?php 

$conn = mysqli_connect($servername, $username, $password, $dbname); // 

// Achievements Unlocked
$sql = "SELECT AchievementProgress.UserID, AchievementProgress.AchievementID, AchievementProgress.AchievementProgress, AchievementProgress.ClassID, Achievements.Name, Achievements.Description, Achievements.XPValue, Achievements.Icon           
FROM `AchievementProgress`
INNER JOIN `Achievements` on AchievementProgress.AchievementID = Achievements.AchievementID WHERE AchievementProgress.UserID='$id' and AchievementProgress.AchievementProgress='1' and AchievementProgress.ClassID = '$selectedClass' ORDER BY AchievementProgress.Timestamp;";
$achievementsFullaq = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$achievementsFullaCount = $achievementsFullaq->num_rows;
$achievementsFulla = array();

while($row = mysqli_fetch_assoc($achievementsFullaq)) {
   $achievementsFulla[] = $row;
}
// Achievements locked
$sql = "SELECT AchievementProgress.UserID, AchievementProgress.AchievementID, AchievementProgress.AchievementProgress, AchievementProgress.ClassID, Achievements.Name, Achievements.Description, Achievements.XPValue, Achievements.Icon           
FROM `AchievementProgress`
INNER JOIN `Achievements` on AchievementProgress.AchievementID = Achievements.AchievementID WHERE AchievementProgress.UserID='$id' and AchievementProgress.AchievementProgress='0' and AchievementProgress.ClassID = '$selectedClass';";
$achievementsFullbq = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$achievementsFullbCount = $achievementsFullbq->num_rows;
$achievementsFullb = array();

while($row = mysqli_fetch_assoc($achievementsFullbq)) {
   $achievementsFullb[] = $row;
}

// Quests Completed
$sql = "SELECT QuestProgress.UserID,  QuestProgress.QuestID, QuestProgress.QuestProgress, QuestProgress.ClassID, Quests.Name, Quests.Description, Quests.XPValue, Quests.Icon           
FROM `QuestProgress`
INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID WHERE QuestProgress.UserID='$id' and QuestProgress.QuestProgress='1' and QuestProgress.ClassID = '$selectedClass' ORDER BY QuestProgress.Timestamp;";
$questsFullaq = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$questsFullaCount = $questsFullaq->num_rows;
$questsFulla = array();

while($row = mysqli_fetch_assoc($questsFullaq)) {
   $questsFulla[] = $row;
}

// Quests Available
$sql = "SELECT QuestProgress.UserID, QuestProgress.QuestID, QuestProgress.QuestProgress, QuestProgress.ClassID, Quests.Name, Quests.Description, Quests.XPValue, Quests.Icon, Quests.Expire          
FROM `QuestProgress`
INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID WHERE QuestProgress.UserID='$id' and QuestProgress.QuestProgress='0' and Quests.Expire>NOW() and QuestProgress.ClassID = '$selectedClass'";
$questsFullbq = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$questsFullbCount = $questsFullbq->num_rows;
$questsFullb = array();

while($row = mysqli_fetch_assoc($questsFullbq)) {
   $questsFullb[] = $row;
}

//Quests Expired
$sql = "SELECT QuestProgress.UserID,  QuestProgress.QuestID, QuestProgress.QuestProgress, QuestProgress.ClassID, Quests.Name, Quests.Description, Quests.XPValue, Quests.Icon, Quests.Expire          
FROM `QuestProgress`
INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID WHERE QuestProgress.UserID='$id' and QuestProgress.QuestProgress='0' and Quests.Expire<NOW() and QuestProgress.ClassID = '$selectedClass';";
$questsFullcq = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$questsFullcCount = $questsFullcq->num_rows;
$questsFullc = array();

while($row = mysqli_fetch_assoc($questsFullcq)) {
   $questsFullc[] = $row;
}


// Quests Expiring
$sql = "SELECT QuestProgress.UserID, QuestProgress.QuestID, QuestProgress.QuestProgress, QuestProgress.ClassID, Quests.Name, Quests.Description, Quests.XPValue, Quests.Icon, Quests.Expire          
FROM `QuestProgress`
INNER JOIN `Quests` on QuestProgress.QuestID = Quests.QuestID WHERE QuestProgress.UserID='$id' and QuestProgress.QuestProgress='0' and Quests.Expire>NOW() ORDER BY Quests.Expire and QuestProgress.ClassID = '$selectedClass';";
$questsFulldq = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$questsFulldCount = $questsFulldq->num_rows;
$questsFulld = array();

while($row = mysqli_fetch_assoc($questsFulldq)) {
   $questsFulld[] = $row;
}

mysqli_close($conn); // Close the connection 
