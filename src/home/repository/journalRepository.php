<?php
    class JournalRepository {
        private $conn;

        public function __construct(string $servername, string $username, string $password, string $dbname) {
            $this->conn = new mysqli($servername, $username, $password, $dbname);
        }

        public function getNumberOfCoffeeTried(int $userId): int {
            $stmt = $this->conn->prepare("SELECT COUNT(*) AS coffeeNum FROM journal WHERE user_id = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();

            $result = $stmt->get_result();

            $row = 0;

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc()["coffeeNum"];
            }

            return $row;
        }

        public function getAverageRating(int $userId): int {
            $stmt = $this->conn->prepare("SELECT AVG(rating) AS ratingAvg FROM journal WHERE user_id = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();

            $result = $stmt->get_result();

            $row = 0;
            $avgRating = $result->fetch_assoc()["ratingAvg"];

            if ($result->num_rows > 0) {
                $row = is_null($avgRating) ? 0 : $avgRating;
            }

            return $row;
        }

        public function getJournalCountThisMonth(int $userId): int {
            $stmt = $this->conn->prepare("SELECT COUNT(*) AS journalCount FROM journal WHERE MONTH(created_at) = MONTH(CURRENT_TIMESTAMP) AND user_id = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();

            $result = $stmt->get_result();

            $row = 0;

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc()["journalCount"];
            }

            return $row;
        }

        public function getRoasterCount(int $userId): int {
            $stmt = $this->conn->prepare("SELECT COUNT(roaster) AS roasterCount FROM journal WHERE user_id = ?");
            $stmt->bind_param("i", $userId);
            $stmt->execute();

            $result = $stmt->get_result();

            $row = 0;

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc()["roasterCount"];
            }

            return $row;
        }

        public function getJournalThumbnails(int $userId): array {
            try {
                //code...
                $stmt = $this->conn->prepare("SELECT image_url FROM journal WHERE user_id = ? ORDER BY `created_at` DESC LIMIT 3");
                $stmt->bind_param("i", $userId);
                $stmt->execute();
    
                $arr = array();
    
                $result = $stmt->get_result();

                $defaultImage = "https://images3.alphacoders.com/606/606500.jpg";
    
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        array_push($arr, empty($row['image_url'] ? "https://images3.alphacoders.com/606/606500.jpg" : $row['image_url']));
                    }
                } else {
                    $arr = array($defaultImage, $defaultImage, $defaultImage);
                }
    
                return $arr;
            } catch (\Throwable $th) {
                echo $th;
            }
        }
    }
?>