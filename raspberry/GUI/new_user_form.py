import tkinter as tk
from tkinter import ttk

from . import GUI_controller

### This clas extends tk.Frame and will crete a frame for creating an employee. 
### The employee is not upload to the database until the fingerprint is set in the next frame.

class NewUserForm(tk.Frame):

    def __init__(self, parent):
        ## Call parent constructor:
        tk.Frame.__init__(self, parent)
        self.parent = parent

        controller = GUI_controller.GUI_controller()
        
        ###Create all the widgets on the frame ###

        title_lbl = ttk.Label(self, text = "Personal Data", width=14, font=("Courier", 18))
        title_lbl.grid(row=0, column = 1, padx = 20, pady = 30)

        name_lbl = ttk.Label(self, text = "Name", font=("Courier", 14))
        name_lbl.grid(row=2, column = 0, padx = 20, pady = 10)
        self.name_TF = ttk.Entry(self, font=("Courier", 14))
        self.name_TF.grid(row=2, column = 1, padx = 20, pady = 10)

        dni_lbl = ttk.Label(self, text = "DNI", font=("Courier", 14))
        dni_lbl.grid(row=3, column = 0, padx = 20, pady = 10)
        self.dni_TF = ttk.Entry(self, font=("Courier", 14))
        self.dni_TF.grid(row=3, column = 1, padx = 20, pady = 10)

        passwd_lbl = ttk.Label(self, text = "Password", font=("Courier", 14))
        passwd_lbl.grid(row=4, column = 0, padx = 20, pady = 10)
        self.passwd_TF = ttk.Entry(self, font=("Courier", 14))
        self.passwd_TF.grid(row=4, column = 1, padx = 20, pady = 10)

        bossmail_lbl = ttk.Label(self, text = "Boss Email", font=("Courier", 14))
        bossmail_lbl.grid(row=5, column = 0, padx = 20, pady = 10)
        self.bossmail_TF = ttk.Entry(self, font=("Courier", 14))
        self.bossmail_TF.grid(row=5, column = 1, padx = 20, pady = 10)

        contract_lbl = ttk.Label(self, text = "Contract", font=("Courier", 14))
        contract_lbl.grid(row=6, column = 0, padx = 20, pady = 10)
        self.contract_combo = ttk.Combobox(self, font=("Courier", 14))
        self.contract_combo["values"] = ["Partial", "Full-time"]
        self.contract_combo.set("Full-time")
        self.contract_combo.grid(row=6, column = 1, padx = 20, pady = 10)

        contract_lbl = ttk.Label(self, text = "Type", font=("Courier", 14))
        contract_lbl.grid(row=7, column = 0, padx = 20, pady = 10)
        self.rol_combo = ttk.Combobox(self, font=("Courier", 14))
        self.rol_combo["values"] = ["Employee", "Admin"]
        self.rol_combo.set("Employee")
        self.rol_combo.grid(row=7, column = 1, padx = 20, pady = 10)

        self.submit_button = tk.Button(self, text="Submit", width = 10, font=("Courier", 14), command = lambda: controller.create_employee(self))
        self.submit_button.grid(row=8, column=3, sticky = 'W', padx = 20, pady = 10)

        ###############################################################


### ONLY FOR TEST POURPOSES: ###
'''root = tk.Tk()
form = NewUserForm(root)
form.pack()
root.mainloop()'''
################################