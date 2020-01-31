import tkinter as tk
from tkinter import StringVar
from tkinter import ttk

class Error(tk.Frame):

    def __init__(self, parent, text_e):
        tk.Frame.__init__(self, parent)
        self.title_lbl = ttk.Label(self, text = "ERROR:", width=30, font=("Courier", 16))
        self.title_lbl.grid(row=0, column = 0, padx = 20, pady = 30)
        self.text_lbl = ttk.Label(self, text = text_e, width=30, font=("Courier", 12))
        self.text_lbl.grid(row=1, column = 0, padx = 20, pady = 30)