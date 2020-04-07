# StringCombinations

The exercise consists of creating and parsing one form field where a string is used as input.  
This string should be validated since we only want numbers.  

Using this number sequence, we would like all possible string combinations this number can generate according to the  
following specifications:  

1 -> nothing  
2 -> ABC  
3 -> DEF  
4 -> GHI  
5 -> JKL  
6 -> MNO  
7 -> PQRS  
8 -> TUV  
9 -> WXYZ    

Note that we follow the layout used on a phone dial.

Example:
input: 23
output:
AD
AE
AF
BD
BE
...
CF

Make sure it works for any input and any length, not just these two numbers we gave in the example.  
Because of computation limits, you could set a limit on the input length.  
