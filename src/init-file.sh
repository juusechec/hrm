#!/bin/bash
PS1="\[\e]0;\u@\h: \w\a\]${debian_chroot:+($debian_chroot)}\[\033[01;32m\]\u@\h\[\033[00m\]:\e[31mdocker\e[0m:\[\033[01;34m\]\w\[\033[00m\] \$ "
cd /htdocs
