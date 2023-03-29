import json
import pymongo


myclient = pymongo.MongoClient("mongodb+srv://Rena:@examen2023.rho8i7v.mongodb.net/test")

db = myclient["Examen2023"] #Databasen

Collection = db["Examen"] #Collection

# Inserting the loaded data in the Collection
with open('C:/Users/Sc2re/OneDrive/Dokument/Examen/Db/passwords.json') as file:
    file_data = json.load(file)
    print("test")
for obj in file_data.values():
    print("for")
    try:
        Collection.insert_one(obj)
        print(obj)
    except Exception as e:
        print(e)
        pass

print("done")
