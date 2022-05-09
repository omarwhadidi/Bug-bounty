# pickling.py
import pickle
import os

class example_class:
    a_number = 35
    a_string = "hey"
    a_list = [1, 2, 3]
    a_dict = {"first": "a", "second": 2, "third": [1, 2, 3]}
    a_tuple = (22, 23)

    def __reduce__(self):
        return (os.system, ('whoami',))

    def __new__(cls):
        print("__new__ called ")
        return super(example_class, cls).__new__(cls)
    def __init__(self):
        print("__init__ called ")
    def __del__(self):
        print("__del__ called ")





my_object = example_class()
print(dir(my_object))
my_pickled_object = pickle.dumps(my_object)  # Pickling the object
print(f"This is my pickled object:\n{my_pickled_object}\n")

my_object.a_dict = None

my_unpickled_object = pickle.loads(my_pickled_object)  # Unpickling the object
print( f"This is a_dict of the unpickled object:\n{my_unpickled_object.a_dict}\n")
print( f"This is a_list of the unpickled object:\n{my_unpickled_object.a_list}\n")