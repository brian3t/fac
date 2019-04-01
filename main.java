import java.util.ArrayList;
import java.util.List;
public class main {
    public static void main(String[] args){
        List<String> names = new ArrayList<String>();

        names.add("James");
        names.add("June");
        names.add("John");

        for(String name: names) {
            if(name.equals("James")) {
                System.out.println("James is in the list.");
                names.remove("James");
                break;
            }
        }
    }
}
