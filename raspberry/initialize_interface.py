import tkinter as tk
import GUI.initial_view as ii


# Tkinter window root. The execution starts here:
root = tk.Tk()
root.title("Movicoders")
root.geometry('600x420+350+200')

# First frame to display
initial_frame = ii.InitialFrame(root)
initial_frame.pack()

#main loop
root.mainloop()