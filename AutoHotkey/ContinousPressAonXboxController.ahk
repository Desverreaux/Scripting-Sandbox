#SingleInstance Force
#NoEnv
;SendMode Input

CapsLock::

loop , 200 {

sleep 20
Send {Joy1}

}


SoundBeep
Loop
{
    Tog = GetKeyState(CapsLock, T)
    ;If Tog = True {
    ;    Break
    ;   }
    Send {Joy1}
    sleep 200  ; Adjust if needed ;)

}

