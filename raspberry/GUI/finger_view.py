import tkinter as tk
from tkinter import StringVar
from tkinter import ttk

from . import GUI_controller
#import fingerprint_module.enroll_worker

### This clas extends tk.Frame and will. 
### The employee is not upload to the database until the fingerprint is set in the next frame.

class FPView(tk.Frame):
    def __init__(self, parent):
        tk.Frame.__init__(self, parent)
        self.title_lbl = ttk.Label(self, text = "New user fingerprint", width=40, font=("Courier", 18))
        self.title_lbl.grid(row=0, column = 0, padx = 20, pady = 30)
        self.msgText1 = StringVar()
        self.msgText1.set("Wait...")
        self.msg_lbl = ttk.Label(self, textvariable=self.msgText1, width=40, font=("Courier", 14))
        self.msg_lbl.grid(row=1, column = 0, padx = 20, pady = 30)
        self.statusText = StringVar()
        self.statusText.set("Status: OK")
        self.status_lbl = ttk.Label(self, textvariable=self.statusText, width=40, font=("Courier", 10))
        self.status_lbl.grid(row=2, column = 0, padx = 10, pady = 12)