#include<stdio.h>
#include<string.h>

int main()
{   
	int i;
     char  arr1[999],arr2[999];
     
     scanf("%s",arr1);
     scanf("%s",arr2);

  int   l=strlen(arr1);
    
    for(i=0;i<l;i++)
    {          
    	if(arr1[i]==arr2[i])
    		printf("0");
    	  else
    	  	printf("1");


    }

    return 0;



}