import tkinter as tk
from tkinter import ttk
from tkinter import StringVar

from . import GUI_controller


class DeleteUser(tk.Frame):
    def __init__(self, parent):

        tk.Frame.__init__(self, parent)
        self.parent = parent

        controller = GUI_controller.GUI_controller()
        
        ###Create all the widgets on the frame ###

        title_lbl = ttk.Label(self, text = "Delete User", width=14, font=("Courier", 18))
        title_lbl.grid(row=0, column = 1, padx = 20, pady = 30)

        dni_lbl = ttk.Label(self, text = "DNI", font=("Courier", 14))
        dni_lbl.grid(row=1, column = 0, padx = 20, pady = 10)
        self.dni_TF = ttk.Entry(self, font=("Courier", 14))
        self.dni_TF.grid(row=1, column = 1, padx = 20, pady = 10)

        '''self.statusText = StringVar()
        self.statusText.set("Status: OK")
        self.status_lbl = ttk.Label(self, textvariable=self.statusText, width=40, font=("Courier", 12))
        self.status_lbl.grid(row=2, column = 0, padx = 10, pady = 12)'''

        self.submit_button = tk.Button(self, text="Delete", width = 10, font=("Courier", 14), command = lambda: controller.delete_employee(self))
        self.submit_button.grid(row=8, column=3, sticky = 'W', padx = 20, pady = 10)