import tkinter as tk
from PIL import Image, ImageTk
from . import new_user_form as nuf
from . import delete_view as dv

'''# some_file.py
import sys
# insert at 1, 0 is the script path (or '' in REPL)
sys.path.insert(1, '/path/to/application/app/folder')

import file'''

### This class extends tk.Frame. Is the initial frame we display with the Movicodes Logo, and only two buttons: New Employee and Delete Employee

class InitialFrame(tk.Frame):

    def __init__(self, parent):
        self.parent = parent
        self.form = None
        self.delete = None
        ##Call to parent constructor:
        tk.Frame.__init__(self, parent)
        ##Add Buttons:
        add_worker_button = tk.Button(self, text="New Employee", height= 2, width = 15, command = self.action_performed_button_new)  # add --> command = to call a method for the next step
        add_worker_button.grid(row=1, column=0, sticky = 'W', pady = 2)
        delete_worker_button = tk.Button(self, text="Detele Employee", height= 2, width = 15)  # add --> command = to call a method for the next step
        delete_worker_button.grid(row=1,column=0, sticky = 'E', pady = 2)

        ##Load image:
        image = Image.open("D:\\Project Finger\\Raspberry\\src\\GUI\\logoM.png")
        photo = ImageTk.PhotoImage(image)

        ##Create a label to contains image:
        label = tk.Label(self, image=photo)
        label.image = photo ## this line need to prevent gc (I don't know whats this mean)
        label.grid(row=0, column = 0)

    def action_performed_button_new(self):
        self.destroy()
        self.form = nuf.NewUserForm(self.parent)
        self.form.pack()

    def action_performed_button_del(self):
        self.destroy()
        self.delete = dv.DeleteUser(self.parent)
        self.delete.pack()

