<?php
class Admin_index_Class
{
    private static $data_view;

    public function __construct()
    {
        $online = new Online();
        $list_online = $online->getAll();

        foreach ($list_online as $user_online) {
            $difference = time() - $user_online->last_time;
            $reste = ($difference % 3600);
            $minute = floor($reste / 60);
            $user_online->last_time = $minute;
                }
            self::$data_view["list_online"] = $list_online;


        $stats = new Statistics();
        $stats->countMember();
        $stats->countMemberBanned();
        $stats->countMemberDisabled();
        $stats->countNews();
        $stats->countComments();
        $average_comment = round($stats->countComments/$stats->countNews, 1);
        self::$data_view["average_comment"] = $average_comment;
        $stats->newsMostPopular();
        $stats->countSubjectsForum();
        $stats->countMessagesForum();
        $average_forum = round($stats->countMessagesForum/$stats->countSubjectsForum, 1);
        self::$data_view["average_forum"] = $average_forum;
        $stats->subjectMostPopular();
        $stats->countLastSubscribe();
        $stats->nameLastSubscribe();
        $stats->countTutorial();
        $stats->countLikes();
        $stats->countDislikes();
        $stats->getWorstTutorial();
        $stats->getBestTutorial();
        self::$data_view["stats"] = $stats;
        $this->buildView();
    }

    private function buildView() {
        $vue = new View("admin_index");
        $vue->genererAdmin(self::$data_view);
    }
}