# Typing Practice Program
This is a simple typing practice program. The code is named `exp5` where
`exp` is short for 'expect', as it sits in a loop expecting keystrokes
and complaining when it doesn't get them; and 5 since this is the fifth
iteration of this program that I've written.

Put source texts in `sources/subdir` for some subdirectory
(for example for programming language practice, maybe `sources/cpp` and `sources/python`,
or for languages `sources/fra` and `sources/esp`.)

To use, simply assign your source to the `$source` variable and
then `require("e.php");`. Some examples of randomly generate source
are in the `examples` directory.

## Limitations
It doesn't work with the compose key system under Linux. I'd happily accept
contributions from someone who knows how it could be made to work. Under Windows
I use WinCompose, which just generates a single keypress for each character
it outputs, rather than composition events.

## Final Note
I wrote this solely for my own practice, and share it in case anybody else finds
it useful. It is not intended to be any kind of professionally produced product:
as it is, it is about 1000 lines of JS and CSS combined, and doesn't need the
kind of complexity management necessary for a large project.
