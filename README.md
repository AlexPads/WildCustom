# WildCustom!

This plugin Teleports a Player to the Specified "World" in the Config and can send Instructions on what to Do (Via a message sent to the Player Only!) Also has New Configureable Text for the Onscreen Teleportaton Broadcast! (Ex... Teleporting..)

# About

What the Plugin Can do:
- Send Configureable Message
- Send Onscreen Configureable text to Player
- Teleport the Player to the Specified world in the Config (Default: world)
- Launch them in the Air to NOT spawn in the Ground!!

What the Plugin Can't do:
- Teleport to an Unloaded world! (Currently being worked on!, Go to Next Section to Read how to make worlds Load!)

# Force load worlds

This Shows you how to Force load worlds!
1. Go to Server Files
2. Find Pocketmine.yml
3. Open Pocketmine.yml in a Text Editor (Ex.. Notepad++)
4. scroll All the way to line 173 (Could be slightly Diffrent) Look for Worlds:
5. Ex...

 #worlds:
 #These settings will override the generator set in server.properties and allows loading multiple levels
 #Example:
 #world:
 #seed: 404
 #generator: FLAT:2;7,59x1,3x3,2;1;decoration(treecount=80 grasscount=45)
 
 6. add -yourworldname to the file and save to server
 7. Ex...
 
 #worlds:
 #These settings will override the generator set in server.properties and allows loading multiple levels
 #Example:
 #world:
 #seed: 404
 #generator: FLAT:2;7,59x1,3x3,2;1;decoration(treecount=80 grasscount=45)
 -- world
 
 That is how you change the world to Always load on server startup!
 Please NOTE: you will NOT have to do this in the future as the plugin will load the world before Teleport!
 
# Info!

Made by TinyPixelDevz!
Discord : https://discord.gg/P5YZQ6Y
Any sugggestions for the plugin will be "Contemplated" and then implemented or Not.
This plugin was worked on by mulltiple people on the team!
List:
- imwood04
- AlexPads
- https://forums.pmmp.io
Server Website: Tinypixel.ga
My Website: alexpads.ga
Download the Phar Here!: 
