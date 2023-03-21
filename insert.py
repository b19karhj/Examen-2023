import json
from pymongo import MongoClient

myclient = MongoClient("mongodb://localhost:27017")

db = myclient["Examen2023"] #Databasen


Collection = db["Examen"] #Collection




# Inserting the loaded data in the Collection
with open('C:/Users/Sc2re/OneDrive/Dokument/Examen/Db/passwords.json') as file:
    file_data = json.load(file)
    
for obj in file_data.values():
    try:
        Collection.insert_one(obj)
        print(obj)
    except Exception:
        pass

print("done")