
#include <iostream>
#include<bits/stdc++.h>
using namespace std;

int main()
{
  
   int n,m,i,j,count=0;
   
   cin>>n>>m;
   int c1=0,c2=0;
   int total=0;
   int flag=1,c=0;

   
   string s[n];
  
   for(i=0;i<n;i++)
   	      cin>>s[i];
              
   for(i=0;i<m;i++)
   	  {
          
          flag=1;

   	  	for(j=0;j<n;j++)
   	  	{
           if(s[j][i]=='S' || s[j][i]=='s')
           {
              	 
              	 	flag=0;
              	 	break;
           }

   	  	}

   	  	if(flag==1)
   	  	{
   	  		total=total+n;
   	  		c++;
   	  	}


   	  }
   

  


   for(i=0;i<n;i++)
      {     
             flag=1;

              for(j=0;j<m;j++)
             {
              	 if(s[i][j]=='S' || s[i][j]=='s')
              	 {
              	 
              	 	flag=0;
              	 	break;
                 }

                    
            }

            if(flag==1)
            {
            	total=total+m-c;
            	
            }

     	    

   	  }




 cout<<total;

return 0;
}
