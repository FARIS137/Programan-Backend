import java.util.ArrayList;  
import java.util.List;  
public class CDType {  
             private List<packing> items=new ArrayList<packing>();  
             public void addItem(packing packs) {    
                    items.add(packs);  
             }  
             public void getCost(){  
              for (packing packs : items) {  
                        packs.price();  
              }   
             }  
             public void showItems(){  
              for (packing packing : items){  
             System.out.print("CD name : "+packing.pack());  
             System.out.println(", Price : "+packing.price());  
          }       
            }     
}//End of the CDType class.  